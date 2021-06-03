import * as ActionTypes from '../action-types';
import Http from '../../http'
import {deleteCookie, getCookie, setCookie} from '../../utils/cookie';

const user = {
    id: null,
    name: null,
    email: null,
    email_confirmed: false,
};

const initialState = {
    isAuthenticated: false,
    isVerified: false,
    hasShow: false,
    user
};

const Auth = (state = initialState, {type, response = null}) => {
    switch (type) {
        case ActionTypes.AUTH_LOGIN:
            return authLogin(state, response);
        case ActionTypes.AUTH_CHECK:
            return checkAuth(state, response);
        case ActionTypes.AUTH_LOGOUT:
            return logout(state);
        default:
            return state;
    }
};

const authLogin = (state, response) => {
    const jwtToken = response.access_token;
    const user = response.user;
    const isVerified = response.user.email_confirmed;
    const hasShow = response.has_show;

    setCookie('is_verified', isVerified);
    setCookie('jwt_token', jwtToken)

    Http.defaults.headers.common['Authorization'] = `Bearer ${jwtToken}`;

    state = Object.assign({}, state, {
        isAuthenticated: true,
        isVerified: getCookie('is_verified') === 'true',
        hasShow: hasShow,
        user
    });

    return state;
};

const checkAuth = (state, response) => {
    const user = response.user;
    const isVerified = response.user.email_confirmed;
    const hasShow = response.has_show;

    setCookie('is_verified', isVerified);

    state = Object.assign({}, state, {
        isAuthenticated: true,
        isVerified: getCookie('is_verified') === 'true',
        hasShow: hasShow,
        user
    });

    return state;
};

const logout = (state) => {
    deleteCookie('jwt_token');

    state = Object.assign({}, state, {
        isAuthenticated: false,
        isVerified: false,
        hasShow: false,
        user
    });

    return state;
};

export default Auth;
