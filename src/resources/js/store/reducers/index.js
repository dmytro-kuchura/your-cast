import {combineReducers} from 'redux'
import Auth from './auth-reducer'
import persistStore from './persist-store'

const RootReducer = combineReducers({
    Auth,
    persistStore
});

export default RootReducer;
