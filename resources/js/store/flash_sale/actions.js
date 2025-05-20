import {HTTP} from '../../core/plugins/http'
import CONSTANTS from '../../core/utils/constants';

//1605

export const flashSalesList = ({commit},opt) => {
    return new Promise((resolve, reject) => {
        HTTP.post('/api/flash-sale/list',opt).then(response => {
            return resolve(response.data);
        }).catch(error => {
            return reject(error);
        })
    });
};

export const deleteFlashSale = ({commit},opt) => {
    console.log(opt);
    return new Promise((resolve, reject) => {
        HTTP.get('/api/flash-sale/delete/'+ opt.id_item).then(response => {
            return resolve(response.data);
        }).catch(error => {
            return reject(error);
        })
    });
};

export const editFlashSale = ({commit},opt) => {
    return new Promise((resolve, reject) => {
        HTTP.get('/api/flash-sale/edit/'+ opt.id).then(response => {
            return resolve(response.data);
        }).catch(error => {
            return reject(error);
        })
    });
};


export const saveFlashSale = ({commit},opt) => {
    return new Promise((resolve, reject) => {
        HTTP.post('/api/flash-sale/create',opt).then(response => {
            return resolve(response.data);
        }).catch(error => {
            return reject(error);
        })
    });
};
