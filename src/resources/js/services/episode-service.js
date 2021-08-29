import * as action from '../store/actions/episode-action'
import Http from '../http'

export function createEpisode(data) {
    let link = '/api/v1/episode/create';

    return dispatch => (
        new Promise((resolve, reject) => {
            Http.post(link, data)
                .then(response => {
                    dispatch(action.createEpisode(response.data.show));
                    return resolve(response.data.show);
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
