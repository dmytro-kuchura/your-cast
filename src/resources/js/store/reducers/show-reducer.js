import * as ActionTypes from '../action-types';
import Http from '../../http'
import {deleteCookie, getCookie, setCookie} from '../../utils/cookie';

const initialState = {
    title: '',
    description: '',
    artwork: null,
    format: 'episodic',
    timezone: 'Etc/GMT',
    language: 'en',
    explicit: false,
    category: null,
    tags: null,
    author: null,
    podcast_owner: null,
    email_owner: null,
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
