<template>
  <div class="flash-sale-form">
    <div class="row">
      <!-- LEFT: General & Items -->
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            <!-- 1. Multi-lang Name -->
            <div class="form-group">
              <label>Tên chương trình</label>
              <vs-input
                  v-model="form.name[0].content"
                  placeholder="Tên (tiếng Việt)"
                  class="w-100"
              />
              <el-button size="small" @click="toggleLang('name')">Đa ngôn ngữ</el-button>
              <div class="mt-2 px-2" v-if="showLang.name">
                <div v-for="(lg,i) in langs" :key="lg.code" v-if="i>0" class="my-1">
                  <label class="d-block">{{ lg.name }}</label>
                  <vs-input
                      v-model="form.name[i].content"
                      placeholder="Tên"
                      class="w-100"
                  />
                </div>
              </div>
            </div>

            <!-- 2. Multi-lang Description -->
            <div class="form-group">
              <label>Mô tả ngắn</label>
              <TinyMce v-model="form.description[0].content" />
              <el-button size="small" @click="toggleLang('description')">Đa ngôn ngữ</el-button>
              <div class="mt-2 px-2" v-if="showLang.description">
                <div v-for="(lg,i) in langs" :key="lg.code" v-if="i>0" class="my-1">
                  <label class="d-block">{{ lg.name }}</label>
                  <TinyMce v-model="form.description[i].content" />
                </div>
              </div>
            </div>

            <!-- 3. Flash Sale Items -->
            <div class="form-group">
              <label>Danh sách sản phẩm Sale</label>
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th style="width:30%">Sản phẩm</th>
                  <th style="width:15%">Biến thể</th>
                  <th style="width:15%">Giá gốc</th>
                  <th style="width:15%">Giá Sale</th>
                  <th style="width:10%">Kho Sale</th>
                  <th style="width:10%">Limit/user</th>
                  <th style="width:5%"></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(item, idx) in form.items" :key="idx">
                  <td>
                    <vs-select
                        v-model="item.product_id"
                        @change="onProductChange(idx)"
                        placeholder="Chọn SP"
                    >
                      <vs-select-item
                          v-for="p in products"
                          :key="p.id"
                          :value="p.id"
                          :text="p.name"
                      />
                    </vs-select>
                  </td>
                  <td>
                    <vs-select
                        v-model="item.variant_id"
                        :disabled="!getVariants(idx).length"
                        placeholder="Chọn biến thể"
                    >
                      <vs-select-item
                          v-for="v in variants[idx]"
                          :key="v.id"
                          :value="v.id"
                          :text="v.name"
                      />
                    </vs-select>
                  </td>
                  <td>
                    <vs-input :value="getOriginalPrice(idx)" disabled />
                  </td>
                  <td>
                    <vs-input
                        type="number"
                        v-model.number="item.sale_price"
                        min="0"
                    />
                  </td>
                  <td>
                    <vs-input
                        type="number"
                        v-model.number="item.stock"
                        min="0"
                    />
                  </td>
                  <td>
                    <vs-input
                        type="number"
                        v-model.number="item.limit_per_user"
                        min="1"
                    />
                  </td>
                  <td class="text-center">
                    <el-button
                        type="danger"
                        icon="el-icon-delete"
                        circle
                        @click="removeItem(idx)"
                    />
                  </td>
                </tr>
                </tbody>
              </table>
              <vs-button type="border" @click="addItem">
                Thêm sản phẩm
              </vs-button>
            </div>

          </div>
        </div>
      </div>

      <!-- RIGHT: Settings -->
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            <!-- 4. Start / End Datetime -->
            <div class="form-group">
              <label>Bắt đầu</label>
              <el-date-picker
                  v-model="form.start_at"
                  type="datetime"
                  placeholder="Chọn thời gian"
                  style="width:100%"
              />
            </div>
            <div class="form-group">
              <label>Kết thúc</label>
              <el-date-picker
                  v-model="form.end_at"
                  type="datetime"
                  placeholder="Chọn thời gian"
                  style="width:100%"
              />
            </div>

            <!-- 5. Trạng thái -->
            <div class="form-group">
              <label>Trạng thái</label>
              <vs-select v-model="form.status">
                <vs-select-item value="scheduled" text="Scheduled" />
                <vs-select-item value="active"    text="Active" />
                <vs-select-item value="ended"     text="Ended" />
                <vs-select-item value="cancelled" text="Cancelled" />
              </vs-select>
            </div>

            <!-- 6. Banner Flash Sale -->
            <div class="form-group">
              <label>Banner</label>
              <ImageMulti v-model="form.banners" :title="'flash-sale-banner'" />
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- SAVE BUTTON -->
    <div class="row mt-3">
      <div class="col-12 text-right">
        <vs-button color="primary" @click="saveFlashSale">
          Lưu chương trình
        </vs-button>
      </div>
    </div>
  </div>
</template>

<script>

import TinyMce from "../_common/tinymce";
import ImageMulti from "../_common/upload_image_multi";
import "tinymce/icons/default/icons.min.js";

export default {
  name: 'FlashSaleForm',
  components: { TinyMce, ImageMulti },
  data() {
    return {
      langs: [],           // load từ API listLanguage()
      products: [],        // load từ API listProducts()
      variants: [],        // array of arrays: biến thể theo mỗi item
      showLang: {
        name: false,
        description: false,
      },
      form: {
        name:      [{ lang_code: 'vi', content: '' }],      // multi-lang
        description:[{ lang_code: 'vi', content: '' }],     // multi-lang
        start_at:  null,
        end_at:    null,
        status:    'scheduled',
        banners:   [],
        items: [
          // mỗi item: product_id, variant_id, sale_price, stock, limit_per_user
        ],
      }
    };
  },
  methods: {
    getVariants(i) {
      return this.variants[i] || [];
    },

    // khởi tạo: load languages, products
    async mounted() {
      this.langs = (await this.$store.dispatch('listLanguage')).data;
      this.products = (await this.$store.dispatch('listProducts')).data.map(p => ({
        id: p.id,
        name: JSON.parse(p.name)[0].content
      }));
    },

    toggleLang(field) {
      this.showLang[field] = !this.showLang[field];
      // đảm bảo mỗi language có slot trong form[field]
      this.langs.forEach((lg,i) => {
        if (!this.form[field][i]) {
          this.form[field].push({ lang_code: lg.code, content: '' });
        }
      });
    },

    addItem() {
      this.form.items.push({
        product_id:  null,
        variant_id:  null,
        sale_price:  0,
        stock:       0,
        limit_per_user: 1
      });
      this.variants.push([]);
    },

    removeItem(i) {
      this.form.items.splice(i, 1);
      this.variants.splice(i, 1);
    },

    async onProductChange(i) {
      const pid = this.form.items[i].product_id;
      // giả sử action trả về biến thể
      const resp = await this.$store.dispatch('getVariantsByProduct', pid);
      this.variants[i] = resp.data;
      // reset variant chọn
      this.form.items[i].variant_id = null;
    },

    getOriginalPrice(i) {
      // nếu đã load products + variants
      const item = this.form.items[i];
      if (item.variant_id) {
        const v = this.variants[i].find(x => x.id === item.variant_id);
        return v ? v.original_price : '';
      }
      const p = this.products.find(x => x.id === item.product_id);
      return p ? p.price : '';
    },

    async saveFlashSale() {
      // validate cơ bản
      const errs = [];
      if (!this.form.name[0].content) errs.push('Tên không được để trống');
      if (!this.form.start_at || !this.form.end_at) errs.push('Chọn đủ thời gian');
      if (!this.form.items.length) errs.push('Phải thêm ít nhất 1 sản phẩm sale');
      if (errs.length) {
        errs.forEach(e => this.$error(e));
        return;
      }

      // call API
      try {
        await this.$store.dispatch('createFlashSale', this.form);
        this.$success('Tạo Flash Sale thành công');
        this.$router.push({ name: 'flashSalesList' });
      } catch (e) {
        this.$error('Có lỗi khi tạo Flash Sale');
      }


    }
  }
};
</script>

<style scoped>
.flash-sale-form .table td,
.flash-sale-form .table th {
  vertical-align: middle;
}
</style>
