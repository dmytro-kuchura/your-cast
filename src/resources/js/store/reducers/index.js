import {combineReducers} from 'redux'
import Auth from './auth-reducer'
import Show from './show-reducer';
import ShowsList from './shows-list-reducer';
import persistStore from './persist-store'

const RootReducer = combineReducers({
    Auth,
    Show,
    ShowsList,
    persistStore
});

export default RootReducer;
