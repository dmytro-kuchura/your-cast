import * as ActionTypes from "../action-types";

export function getShows(payload) {
    return {
        type: ActionTypes.SHOW_LIST,
        payload
    }
}

export function getOneShow(payload) {
    return {
        type: ActionTypes.SHOW_INNER,
        payload
    }
}

export function createShowStepFirst(payload) {
    return {
        type: ActionTypes.SHOW_CREATE_STEP_FIRST,
        payload
    }
}
