import {HTTP} from '../../core/plugins/http'
import CONSTANTS from '../../core/utils/constants';

//1605

export const AttributeList = ({commit},opt) => {
    return new Promise((resolve, reject) => {
        HTTP.post('/api/attributes/list',opt).then(response => {
            return resolve(response.data);
        }).catch(error => {
            return reject(error);
        })
    });
};

export const getAttribute = ({commit},opt) => {
    return new Promise((resolve, reject) => {
        HTTP.get('/api/attributes/edit/'+ opt.id).then(response => {
            return resolve(response.data);
        }).catch(error => {
            return reject(error);
        })
    });
};


export const saveAttribute = ({commit},opt) => {
    return new Promise((resolve, reject) => {
        HTTP.post('/api/attributes/add',opt).then(response => {
            return resolve(response.data);
        }).catch(error => {
            return reject(error);
        })
    });
};

export const destroyAttribute  = ({commit},opt) => {
    return new Promise((resolve, reject) => {
        HTTP.get('/api/attributes/delete/'+ opt.id).then(response => {
            return resolve(response.data);
        }).catch(error => {
            return reject(error);
        })
    });
};

