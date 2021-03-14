import Http from '../http'

export function uploadImage(data) {
    let link = '/api/v1/upload-image';

    const formData = new FormData();

    for (const [key, value] of Object.entries(data)) {
        if (value !== null) {
            formData.append(key, value)
        }
    }

    return dispatch => (
        new Promise((resolve, reject) => {
            Http.post(link, formData)
                .then(response => {
                    return resolve(response.data);
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
