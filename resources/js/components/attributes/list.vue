<template>
    <!-- partial -->
    <div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Danh sách thuộc tính sản phẩm</h4>
                        <p class="card-description">Thêm mới hoặc sửa thuộc tính sản phẩm</p>
                        <vs-button type="gradient" style="float:right;" @click="popupActivo=true">Thêm mới</vs-button>
                        <vs-input
                            icon="search"
                            placeholder="Search"
                            v-model="keyword"
                            @keyup="searchCategory()"
                        />
                        <vs-table pagination :data="list" :max-items="perPage" @pagination="onPageChange">
                            <template slot="thead">
                                <vs-th>ID</vs-th>
                                <vs-th>Tên</vs-th>
                                <vs-th>Kiểu dữ liệu</vs-th>
                                <vs-th>Hành động</vs-th>
                            </template>
                            <template slot-scope="{data}">
                                <vs-tr :key="indextr" v-for="(tr, indextr) in data">
                                    <vs-td>{{ getSerial(indextr) }}</vs-td>
                                    <vs-td :data="tr.name">{{JSON.parse(tr.name)[0].content}}</vs-td>
                                    <vs-td :data="tr.id">{{tr.type}}</vs-td>
                                    <vs-td :data="tr.id">
                                        <router-link :to="{name:'editAttribute',params:{id:tr.id}}">
                                            <vs-button
                                                vs-type="gradient"
                                                size="lagre"
                                                color="success"
                                                icon="edit"
                                            ></vs-button>
                                        </router-link> &nbsp;
                                        <vs-button vs-type="gradient" size="lagre" color="red" icon="delete_forever" @click="confirmDestroy(tr.id)"></vs-button>
                                    </vs-td>
                                </vs-tr>
                            </template>
                        </vs-table>
                    </div>
                </div>
            </div>
        </div>
        <vs-popup style="width:100%;" title="Thêm mới thuộc tính" :active.sync="popupActivo">
            <ModalAdd @closePopup="closePop($event)" />
        </vs-popup>
    </div>
</template>


<script>
import ModalAdd from "../layouts/modal/attribute/add";

import { mapActions } from "vuex";
import {AttributeList, destroyAttribute} from "../../store/attribute/actions";
export default {
    data: () => ({
        keyword: null,
        popupActivo: false,
        list: [],
        timer:0,
        id_item :'',
        currentPage: 1,
        perPage: 10,
    }),
    components: {
        ModalAdd
    },
    computed: {

    },
    methods: {
        ...mapActions(["AttributeList","destroyAttribute", "loadings"]),
        closePop(event) {
            this.listAttribute();
            this.popupActivo = event;
        },
        listAttribute() {
            this.loadings(true);
            this.AttributeList({ keyword: this.keyword })
                .then(response => {
                    this.loadings(false);
                    this.list = response.data;
                });
        },
        searchCategory() {
            if (this.timer) {
                clearTimeout(this.timer);
                this.timer = null;
            }
            this.timer = setTimeout(() => {
                this.AttributeList({ keyword: this.keyword })
                    .then(response => {
                        this.loadings(false);
                        this.list = response.data;
                    });
            }, 800);
        },
        destroy(){
            this.loadings(true);
            this.destroyAttribute({id:this.id_item})
                .then(response => {
                    this.AttributeList();
                    this.loadings(false);
                    this.$success('Xóa thuộc tính thành công');
                    this.listAttribute()
                });
        },
        confirmDestroy(id){
            this.id_item = id;
            this.$vs.dialog({
                type:'confirm',
                color: 'danger',
                title: `Bạn có chắc chắn`,
                text: 'Xóa thuộc tính này',
                accept:this.destroy
            })
        },
        onPageChange({ currentPage }) {
            this.currentPage = currentPage;
        },
        getSerial(indexInPage) {
            return (this.currentPage - 1) * this.perPage + (indexInPage + 1);
        },
    },
    mounted() {
        this.listAttribute()
    }
};
</script>
<style>
</style>
