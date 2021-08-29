import * as ActionTypes from '../action-types';

export function createEpisode(payload) {
    return {
        type: ActionTypes.EPISODE_CREATE,
        payload
    }
}
