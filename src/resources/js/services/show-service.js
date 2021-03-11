import * as action from '../store/actions/show-action'
import Http from '../http'

export function createShow(data) {
    let link = '/api/v1/show/create';

    return dispatch => (
        new Promise((resolve, reject) => {
            Http.post(link, data)
                .then(response => {
                    dispatch(action.createShowStepFirst(response.data.result));
                    return resolve();
                })
                .catch(err => {
                    const statusCode = err.response.status;
                    const data = {
                        error: null,
                        statusCode,
                    };
                    return reject(data);
                })
        })
    );
}

export function updateRecord(id, data) {
    let link = '/api/v2/blog/' + id;

    return dispatch => (
        new Promise((resolve, reject) => {
            Http.put(link, data)
                .then(response => {
                    return resolve();
                })
                .catch(err => {
                    const statusCode = err.response.status;
                    const data = {
                        error: null,
                        statusCode,
                    };
                    return reject(data);
                })
        })
    );
}

export function getRecordById(param) {
    let link = '/api/v2/blog/' + param;

    return dispatch => (
        new Promise((resolve, reject) => {
            Http.get(link)
                .then(response => {
                    dispatch(action.getOneRecord(response.data.result));
                    return resolve();
                })
                .catch(err => {
                    const statusCode = err.response.status;
                    const data = {
                        error: null,
                        statusCode,
                    };
                    return reject(data);
                })
        })
    );
}
