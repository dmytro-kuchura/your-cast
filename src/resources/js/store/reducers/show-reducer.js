import * as ActionTypes from '../action-types';
import Http from '../../http'
import {deleteCookie, getCookie, setCookie} from '../../utils/cookie';

const initialState = {
    id: null,
    user_id: null,
    title: null,
    description: null,
    artwork: null,
    format: null,
    timezone: null,
    language: null,
    explicit: null,
    category: null,
    tags: null,
    author: null,
    podcast_owner: null,
    email_owner: null,
    step: null,
    copyright: null,
};

const Show = (state = initialState, {type, payload = null}) => {
    switch (type) {
        case ActionTypes.SHOW_CREATE:
        case ActionTypes.SHOW_UPDATE:
        case ActionTypes.SHOW_INNER:
            return showState(state, payload);
        default:
            return state;
    }
};

const showState = (state, payload) => {
    state = Object.assign({}, state, payload);

    return state;
};

export default Show;
