<template>
  <div class="flash-sale-form">
    <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            <div class="form-group">
              <label>Tên chương trình</label>
              <vs-input
                  v-model="form.name[0].content"
                  placeholder="Tên (tiếng Việt)"
                  class="w-100"
              />
              <el-button size="small" @click="showSettingLangExist('name')">Đa ngôn ngữ</el-button>
              <div class="mt-2 px-2" v-if="showLang.name">
                <div v-for="(lg,i) in lang" :key="lg.code" v-if="i>0" class="my-1">
                  <label class="d-block">{{ lg.name }}</label>
                  <vs-input
                      v-model="form.name[i].content"
                      placeholder="Tên"
                      class="w-100"
                  />
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Mô tả ngắn</label>
              <TinyMce v-model="form.description[0].content" />
              <el-button size="small" @click="showSettingLangExist('description')">Đa ngôn ngữ</el-button>
              <div class="mt-2 px-2" v-if="showLang.description">
                <div v-for="(lg,i) in lang" :key="lg.code" v-if="i>0" class="my-1">
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
                        <th style="width:30%">Danh mục</th>
                        <th style="width:15%">Giá gốc</th>
                        <th style="width:15%">% Giảm giá</th>
                        <th style="width:15%">Giá Sale</th>
                        <th style="width:5%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item, idx) in form.items" :key="idx">
                        <td>{{ item.name || '—' }}</td>
                        <td>{{ item.category || '—' }}</td>
                        <td>
                            <vs-input :value="formatCurrency(item.price)" disabled />
                        </td>
                        <td>
                            <vs-input :value="item.discount + '%'" disabled />
                        </td>
                        <td>
                            <vs-input
                                :value="formatCurrency(item.sale_price)"
                                disabled
                            />
                        </td>

                        <td class="text-center">
                            <el-button type="danger" icon="el-icon-delete" circle @click="removeItem(idx)"/>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <vs-button @click="openProductModal">Thêm sản phẩm</vs-button>

            </div>

          </div>
        </div>
      </div>



        <template>
            <el-dialog
                title="Chọn sản phẩm"
                :visible.sync="showProductModal"
                width="60%"
            >
                <!-- Search bar -->
                <div class="flex items-center mb-4">
                    <!-- Nhập text -->
                    <el-input
                        v-model="searchQuery"
                        placeholder="Tìm theo tên sản phẩm..."
                        clearable
                        style="flex:1; margin-right: 8px;"
                        @keyup.enter="searchProducts"
                    />
                    <!-- Nút tìm kiếm -->
                    <el-button
                        type="primary"
                        icon="el-icon-search"
                        @click="searchProducts"
                    >
                        Tìm kiếm
                    </el-button>
                </div>

                <!-- Table -->
                <vs-table
                    stripe
                    :data="products"
                    max-items="10"
                    pagination
                >
                    <template slot="header">
                        <vs-th>Tên sản phẩm</vs-th>
                        <vs-th>Danh mục</vs-th>
                        <vs-th width="100">Chọn</vs-th>
                    </template>
                    <template slot="default" slot-scope="{ data }">
                        <vs-tr v-for="item in data" :key="item.id">
                            <vs-td>{{ item.name }}</vs-td>
                            <vs-td>{{ item.category }}</vs-td>
                            <vs-td class="text-center">
                                <vs-button size="small" @click="addItemFromModal(item)">
                                    Chọn
                                </vs-button>
                            </vs-td>
                        </vs-tr>
                    </template>
                </vs-table>
            </el-dialog>
        </template>

        <!-- RIGHT: Settings -->
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            <!-- 4. Start / End Datetime -->
            <div class="form-group">
              <label>Ngày bắt đầu</label>
              <el-date-picker
                  v-model="form.start_at"
                  type="date"
                  placeholder="Chọn thời gian"
                  style="width:100%"
              />
            </div>
              <div class="form-group">
                  <label>Giờ bắt đầu</label>
                   <el-time-picker
                      v-model="form.start_time"
                      type="time"
                      placeholder="Chọn thời gian"
                      style="width:100%"
                  />
              </div>

              <div class="form-group">
                  <label>Giờ kết thúc</label>
                  <el-time-picker
                      v-model="form.end_time"
                      type="time"
                      placeholder="Chọn thời gian"
                      style="width:100%"
                  />
              </div>

<!--            <div class="form-group">-->
<!--              <label>Kết thúc</label>-->
<!--              <el-date-picker-->
<!--                  v-model="form.end_at"-->
<!--                  type="datetime"-->
<!--                  placeholder="Chọn thời gian"-->
<!--                  style="width:100%"-->
<!--              />-->
<!--            </div>-->

            <!-- 5. Trạng thái -->
            <div class="form-group">
              <label>Trạng thái</label>
              <vs-select v-model="form.status">
                  <vs-select-item value="active"   text="Bật" />
                  <vs-select-item value="inactive" text="Tắt" />
              </vs-select>
            </div>

            <!-- 6. Banner Flash Sale -->
            <div class="form-group">
              <label>Banner</label>
              <ImageMulti v-model="form.images" :title="'flash-sale-banner'" />
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
import {mapActions} from "vuex";

export default {
    name: 'FlashSaleForm',
    components: { TinyMce, ImageMulti },

    data() {
        return {
            lang: [],
            searchQuery: '',
            showLang: {
                name: false,
                description: false,
            },
            products: [],
            loading: false,
            showProductModal: false,
            form: {
                lang: "",
                name:      [{ lang_code: 'vi', content: '' }],
                description:[{ lang_code: 'vi', content: '' }],
                start_at:  null,
                start_time:    null,
                end_time:    null,
                status:    'inactive',
                images:   [],
                items: [],
            },
        };
    },

    methods: {
        ...mapActions({
            fetchProducts: 'listProduct',
            setLoading:    'loadings',
            listLanguage:    'listLanguage',
        }),

        async searchProducts() {
            const res = await this.fetchProducts({ keyword: this.searchQuery });

            this.products = res.data.map(p => ({
                id: p.id,
                name: JSON.parse(p.name)[0].content,
                category: JSON.parse(p.cate)[0].content,
                price:    p.price,
                discount: p.discount
            }));
        },

        listLang() {
            this.listLanguage()
                .then((response) => {
                    this.loadings(false);
                    this.lang = response.data;
                })
                .catch((error) => {});
        },

        async openProductModal() {
            // 1. Load data (bằng Vuex action hoặc axios)
            const res = await this.fetchProducts({ keyword: '' });
            this.products = res.data.map(p => ({
                id: p.id,
                name: JSON.parse(p.name)[0].content,
                category: JSON.parse(p.cate)[0].content,
                price:    p.price,
                discount: p.discount
            }));
            // 2. Mở modal
            this.showProductModal = true;
        },

        showSettingLangExist(value, name = "content") {
            if (value == "description") {
                this.showLang.description = !this.showLang.description;
                this.lang.forEach((value, index) => {
                    if (
                        !this.form.description[index] &&
                        value.code != this.form.description[0].lang_code
                    ) {
                        var oj = {};
                        oj.lang_code = value.code;
                        oj.content = "";
                        this.form.description.push(oj);
                    }
                });
            }
            if (value == "name") {
                this.showLang.name = !this.showLang.name;
                this.lang.forEach((value, index) => {
                    if (
                        !this.form.name[index] &&
                        value.code != this.form.name[0].lang_code
                    ) {
                        var oj = {};
                        oj.lang_code = value.code;
                        oj.content = "";
                        this.form.name.push(oj);
                    }
                });
            }
        },

        getProductName(productId) {
            const p = this.products.find(x => x.id === productId);
            return p ? p.name : null;
        },

        getCategoryName(productId) {
            const p = this.products.find(x => x.id === productId);
            return p ? p.category : null;
        },

        addItemFromModal(product) {
            const exists = this.form.items.some(item => item.product_id === product.id);
            if (exists) {
                this.$message.warning('Sản phẩm này đã được thêm rồi');
                return;
            }

            const sale = this.computeSalePrice(product.price, product.discount);

            this.form.items.push({
                product_id:     product.id,
                name:    product.name,
                category:     product.category,
                price:      product.price,
                discount:   product.discount,
                sale_price: sale
            });

            this.showProductModal = false;
        },

        computeSalePrice(price, discount) {
            return Math.round(price * (1 - discount / 100));
        },

        formatCurrency(value) {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(value);
        },

        removeItem(idx) {
            this.form.items.splice(idx, 1);
        },

        toSeconds(time) {
            let h, m, s;
            if (typeof time === 'string') {
                // "HH:mm:ss"
                [h, m, s] = time.split(':').map(Number);
            } else if (time instanceof Date) {
                h = time.getHours();
                m = time.getMinutes();
                s = time.getSeconds();
            } else {
                return 0;
            }
            return h * 3600 + m * 60 + s;
        },

        async saveFlashSale() {
            const errs = [];
            if (!this.form.name[0].content)      errs.push('Tên không được để trống');

            if (!this.form.start_at || !this.form.start_time || !this.form.end_time ) {
                errs.push('Chọn đủ thời gian, giờ băt đầu và kết thúc');
            } else {
                const startSec = this.toSeconds(this.form.start_time);
                const endSec   = this.toSeconds(this.form.end_time);

                if (endSec <= startSec) {
                    errs.push('Giờ kết thúc phải sau giờ bắt đầu');
                }
            }

            if (!this.form.items.length)         errs.push('Phải thêm ít nhất 1 sản phẩm sale');
            if(this.form.images.length == 0) errs.push('Vui lòng chọn ảnh');

            if (errs.length) {
                errs.forEach(e => this.$error(e));
                return;
            }

            try {
                await this.$store.dispatch('saveFlashSale', this.form);
                this.$success('Tạo Flash Sale thành công');
                this.$router.push({ name: 'flashSalesList' });
            } catch {
                this.$error('Có lỗi khi tạo Flash Sale');
            }
        },
    },

    async mounted() {
        this.loading = true;
        this.setLoading(true);

        try {
            const langRes = await this.$store.dispatch('listLanguage');
            this.lang = langRes.data;

            // const res = await this.fetchProducts({ keyword: '' });
            // this.products = res.data.map(p => ({
            //     id:   p.id,
            //     name: Array.isArray(p.name)
            //         ? p.name[0].content
            //         : (JSON.parse(p.name)[0]?.content || ''),
            //
            // }));
            // console.log('Loaded products:', this.products);
        } catch (err) {
            console.error('Load dữ liệu thất bại:', err);
        } finally {
            this.loading = false;
            this.setLoading(false);
        }
    },
};

</script>

<style scoped>
.flash-sale-form .table td,
.flash-sale-form .table th {
  vertical-align: middle;
}
</style>
