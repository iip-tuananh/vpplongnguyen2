
<template>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" >Danh sách chương trình flash sale</h4>
                    <p class="card-description">Thêm mới hoặc flash sale</p>

                    <router-link class="nav-link" :to="{name:'createFlashSale'}">
                        <vs-button type="gradient" style="float:right;">Thêm mới</vs-button>
                    </router-link>

                    <vs-input icon="search" placeholder="Search" v-model="keyword" @keyup="searchFs()"/>
                    <vs-table stripe :data="list" max-items="10" pagination>
                        <template slot="thead">
                            <vs-th>Banner</vs-th>
                            <vs-th>Tên chương trình</vs-th>
                            <vs-th>Ngày áp dụng</vs-th>
                            <vs-th>Trạng thái</vs-th>
                            <vs-th>Hành động</vs-th>
                        </template>
                        <template slot-scope="{data}">
                            <vs-tr :key="indextr" v-for="(tr, indextr) in data">
                                <vs-td ><vs-avatar size="large" :src="JSON.parse(tr.images)[0]"/></vs-td>
                                <vs-td>{{JSON.parse(tr.name)[0].content}}</vs-td>
                                <vs-td >{{ tr.ngay_ap_dung}}</vs-td>
                                <vs-chip
                                    :color="tr.status === 'active' ? 'success' : 'danger'"
                                    size="small"
                                >
                                    {{ tr.status_name }}
                                </vs-chip>
                                <vs-td >
                                    <router-link :to="{name:'editFlashSale',params:{id_construction:tr.id}}">
                                        <vs-button
                                            vs-type="gradient"
                                            size="lagre"
                                            color="success"
                                            icon="edit"
                                        ></vs-button>
                                    </router-link>
                                    <vs-button vs-type="gradient" size="lagre" color="red" icon="delete_forever" @click="confirmDestroy(tr.id)"></vs-button>
                                </vs-td>
                            </vs-tr>
                        </template>
                    </vs-table>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import Swal from "sweetalert2";
import { mapActions } from "vuex";
import {flashSalesList} from "../../store/flash_sale/actions";
export default {
    data() {
        return {
            list:[],
            keyword:"",
            objDel:{
                id_item:"",
                slug:"",
            }

        };
    },
    components: {},
    computed: {},
    watch: {},
    methods: {
        ...mapActions(['flashSalesList','deleteFlashSale','loadings']),
        listFlashSales(){
            this.loadings(true);
            this.flashSalesList({ keyword: this.keyword })
                .then(response => {
                    this.loadings(false);
                    this.list = response.data;
                }).catch(err => {
                this.loadings(false);
                this.list = err.data;
            });
        },
        searchFs() {
            if (this.timer) {
                clearTimeout(this.timer);
                this.timer = null;
            }
            this.timer = setTimeout(() => {
                this.listFlashSales({ keyword: this.keyword })
                    .then(response => {
                        this.list = response.data;
                    });
            }, 800);
        },
        destroy(){
            this.deleteFlashSale(this.objDel).then(response => {
                this.listFlashSales();
                this.$success('xóa thành công');
            });
        },
        confirmDestroy(id,slug){
            this.objDel.id_item = id;
            this.$vs.dialog({
                type:'confirm',
                color: 'danger',
                title: `Bạn có chắc chắn`,
                text: 'Xóa chương trình này',
                accept:this.destroy
            })
        }
    },
    mounted() {
        this.listFlashSales();
    }
};
</script>
