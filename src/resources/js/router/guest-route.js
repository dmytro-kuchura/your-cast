import React from 'react'
import {Route} from 'react-router'
import Auth from '../auth';

const PublicRoute = ({component: Component, ...rest}) => (
    <Route {...rest} render={props => (
        <Auth>
            <Component {...props}/>
        </Auth>
    )}/>
);

export default PublicRoute;
