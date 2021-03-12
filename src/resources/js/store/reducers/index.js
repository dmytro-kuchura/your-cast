import {combineReducers} from 'redux'
import Auth from './auth-reducer'
import Show from './show-reducer';
import persistStore from './persist-store'

const RootReducer = combineReducers({
    Auth,
    Show,
    persistStore
});

export default RootReducer;
