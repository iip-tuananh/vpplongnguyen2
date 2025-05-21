<template>
    <div class="flash-sale-form">
        <h4>Chỉnh sửa Flash Sale</h4>
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
                            <el-button size="small" @click="toggleLang('name')">Đa ngôn ngữ</el-button>
                            <div class="mt-2 px-2" v-if="showLang.name">
                                <div v-for="(lg,i) in languages" :key="lg.code" v-if="i>0" class="my-1">
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
                            <el-button size="small" @click="toggleLang('description')">Đa ngôn ngữ</el-button>
                            <div class="mt-2 px-2" v-if="showLang.description">
                                <div v-for="(lg,i) in languages" :key="lg.code" v-if="i>0" class="my-1">
                                    <label class="d-block">{{ lg.name }}</label>
                                    <TinyMce v-model="form.description[i].content" />
                                </div>
                            </div>
                        </div>

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
                                    <td>{{  getProductName(item.product_id, item) }}</td>
                                    <td>{{ getCategoryName(item.product_id, item) }}</td>
                                    <td><vs-input :value="formatCurrency(item.price)" disabled /></td>
                                    <td><vs-input :value="item.discount + '%'" disabled /></td>
                                    <td><vs-input :value="formatCurrency(item.sale_price)" disabled /></td>
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

            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
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
                                format="HH:mm"
                                value-format="HH:mm:ss"
                            />
                        </div>

                        <div class="form-group">
                            <label>Giờ kết thúc</label>
                            <el-time-picker
                                v-model="form.end_time"
                                type="time"
                                placeholder="Chọn thời gian"
                                style="width:100%"
                                format="HH:mm"
                                value-format="HH:mm:ss"
                            />
                        </div>

<!--                        <div class="form-group">-->
<!--                            <label>Kết thúc</label>-->
<!--                            <el-date-picker-->
<!--                                v-model="form.end_at"-->
<!--                                type="datetime"-->
<!--                                placeholder="Chọn thời gian"-->
<!--                                style="width:100%"-->
<!--                            />-->
<!--                        </div>-->

                        <!-- Trạng thái -->
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <vs-select v-model="form.status">
                                <vs-select-item value="active"   text="Bật" />
                                <vs-select-item value="inactive" text="Tắt" />
                            </vs-select>
                        </div>

                        <!-- Banner -->
                        <div class="form-group">
                            <label>Banner</label>
                            <ImageMulti v-model="form.images" :title="'flash-sale-banner'" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 text-right">
                <vs-button color="primary" @click="saveFs">
                    {{ isEdit ? 'Cập nhật' : 'Tạo mới' }}
                </vs-button>
            </div>
        </div>
    </div>
</template>

<script>
import TinyMce from "../_common/tinymce";
import ImageMulti from "../_common/upload_image_multi";
import { mapActions } from "vuex";
import {saveFlashSale} from "../../store/flash_sale/actions";

export default {
    name: "FlashSaleForm",
    components: { TinyMce, ImageMulti },

    data() {
        return {
            isEdit: false,
            flashSaleId: null,
            languages: [],
            searchQuery: '',
            showLang: { name: false, description: false },
            products: [],
            showProductModal: false,
            loading: false,
            form: {
                id:0,
                name:        [{ lang_code: "vi", content: "" }],
                description: [{ lang_code: "vi", content: "" }],
                start_at:    null,
                start_time:    null,
                end_time:    null,
                status:      "inactive",
                images: [],
                items:       [],
            },
        };
    },

    methods: {
        ...mapActions({
            fetchProducts:    "listProduct",
            fetchLanguages:   "listLanguage",
            fetchFlashSale:   "editFlashSale",
            saveFlashSale:  "saveFlashSale",
            setLoading:       "loadings",
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

        toggleLang(field) {
            this.showLang[field] = !this.showLang[field];
            this.languages.forEach((lg,i) => {
                if (!this.form[field][i]) {
                    this.form[field].push({ lang_code: lg.code, content: "" });
                }
            });
        },

        getProductName(id, item) {
            const p = this.products.find(x => x.id === id);
            return p && p.name ? p.name : item.name;
        },

        getCategoryName(id, item) {
            const p = this.products.find(x => x.id === id);
            return p && p.category ? p.category : item.category;
        },

        formatCurrency(v) {
            return new Intl.NumberFormat("vi-VN", {
                style: "currency",
                currency: "VND"
            }).format(v);
        },

        computeSalePrice(price, discount) {
            return Math.round(price * (1 - discount / 100));
        },

        openProductModal() {
            this.fetchProducts({ keyword: "" }).then(res => {
                this.products = res.data.map(p => ({
                    id: p.id,
                    name: JSON.parse(p.name)[0].content,
                    category: JSON.parse(p.cate)[0].content,
                    price: p.price,
                    discount: p.discount,
                    sale_price: this.computeSalePrice(p.price, p.discount)
                }));
                this.showProductModal = true;
            });
        },

        addItemFromModal(p) {
            const exists = this.form.items.some(item => item.product_id === p.id);
            if (exists) {
                this.$message.warning('Sản phẩm này đã được thêm rồi');
                return;
            }

            const sale = this.computeSalePrice(p.price, p.discount);

            this.form.items.push({
                product_id:  p.id,
                name:    p.name,
                category:     p.category,
                price:       p.price,
                discount:    p.discount,
                sale_price:  sale
            });
            this.showProductModal = false;
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

        async saveFs() {
            const errs = [];
            if (!this.form.name[0].content)      errs.push('Tên không được để trống');

            if (!this.form.start_at || !this.form.start_time || !this.form.end_time ) {
                errs.push('Chọn đủ thời gian, giờ băt đầu và kết thúc');
            } else {
                const startSec = this.toSeconds(this.form.start_time);
                const endSec   = this.toSeconds(this.form.end_time);

                console.log(this.form.start_time)
                console.log(this.form.end_time)

                if (endSec <= startSec) {
                    errs.push('Giờ kết thúc phải sau giờ bắt đầu');
                }
            }

            if (!this.form.items.length)         errs.push('Phải thêm ít nhất 1 sản phẩm sale');
            if (errs.length) {
                errs.forEach(e => this.$error(e));
                return;
            }

            await this.saveFlashSale( this.form );
            this.$success("Cập nhật thành công");

            this.$router.push({ name: "flashSalesList" });
        },
    },

    async mounted() {
        this.loading = true;
        this.setLoading(true);

        const langRes = await this.fetchLanguages();
        this.languages = langRes.data;

        this.fetchProducts({ keyword: "" }).then(res => {
            this.products = res.data.map(p => ({
                id: p.id,
                name: JSON.parse(p.name)[0].content,
                category: JSON.parse(p.cate)[0].content,
                price: p.price,
                discount: p.discount
            }));
        });

        const id = this.$route.params.id_construction;

        if (id) {
            this.isEdit = true;
            this.flashSaleId = id;
            const detail = await this.fetchFlashSale({ id });
            const d = detail.data;

            this.form = {
                id:        d.id,
                name:        JSON.parse(d.name),
                description: JSON.parse(d.description),
                start_at:    d.start_at,
                start_time:      d.start_time,
                end_time:      d.end_time,
                status:      d.status,
                images:      JSON.parse(d.images),
                items:       d.items.map(i => {
                    const price    = i.product.price;
                    const discount = i.product.discount;
                    const category = i.product.cate;
                    const name = JSON.parse(i.product.name)[0].content;
                    const cate = JSON.parse(category.name)[0].content;
                    const sale_price = Math.round(price * (1 - discount / 100));

                    return {
                        product_id:  i.product_id,
                        name:    name,
                        category:     cate,
                        price,
                        discount,
                        sale_price
                    }
                })

            };
        }

        this.loading = false;
        this.setLoading(false);
    }
};
</script>

<style scoped>
.flash-sale-form .table td,
.flash-sale-form .table th {
    vertical-align: middle;
}
</style>
