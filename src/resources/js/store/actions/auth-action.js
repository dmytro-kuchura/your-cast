import * as ActionTypes from "../action-types";

export function authLogin(response) {
    return {
        type: ActionTypes.AUTH_LOGIN,
        response
    }
}

export function authLogout() {
    return {
        type: ActionTypes.AUTH_LOGOUT
    }
}

export function authCheck(response) {
    return {
        type: ActionTypes.AUTH_CHECK,
        response
    }
}
