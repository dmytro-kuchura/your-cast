import * as action from '../store/actions/show-action'
import Http from '../http'

export function createShow(data) {
    let link = '/api/v1/show/create';

    return dispatch => (
        new Promise((resolve, reject) => {
            Http.post(link, data)
                .then(response => {
                    dispatch(action.createShow(response.data.show));
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

export function updateShow(id, data) {
    let link = '/api/v1/show/update/' + id;

    return dispatch => (
        new Promise((resolve, reject) => {
            Http.put(link, data)
                .then(response => {
                    dispatch(action.updateShow(response.data.show));
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

export function getShowById(id) {
    let link = '/api/v1/show/' + id;

    return dispatch => (
        new Promise((resolve, reject) => {
            Http.get(link)
                .then(response => {
                    dispatch(action.getShow(response.data.result));
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
