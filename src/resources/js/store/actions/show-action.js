import * as ActionTypes from "../action-types";

export function getShows(payload) {
    return {
        type: ActionTypes.SHOW_LIST,
        payload
    }
}

export function getShow(payload) {
    return {
        type: ActionTypes.SHOW_INNER,
        payload
    }
}

export function createShow(payload) {
    return {
        type: ActionTypes.SHOW_CREATE,
        payload
    }
}

export function updateShow(payload) {
    return {
        type: ActionTypes.SHOW_UPDATE,
        payload
    }
}
