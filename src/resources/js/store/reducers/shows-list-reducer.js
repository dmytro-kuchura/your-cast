import * as ActionTypes from '../action-types';

const initialState = {
    list: []
};

const ShowsList = (state = initialState, {type, payload = null}) => {
    switch (type) {
        case ActionTypes.SHOW_LIST:
            return showState(state, payload);
        default:
            return state;
    }
};

const showState = (state, payload) => {
    state = Object.assign({}, state, {
        list: payload
    });

    return state;
};

export default ShowsList;
