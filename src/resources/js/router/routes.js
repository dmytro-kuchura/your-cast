import Logout from '../pages/logout';

import Login from '../pages/auth/login'
import Register from '../pages/auth/register'
import ForgotPassword from '../pages/auth/forgot-password'
import ResetPassword from '../pages/auth/reset-password'

import Dashboard from '../pages/dashboard'
import Settings from '../pages/settings';
import NotFound from '../pages/not-found';

const routes = [
    {
        path: '/account',
        exact: true,
        auth: true,
        component: Dashboard
    }, {
        path: '/account/login',
        exact: true,
        auth: false,
        component: Login
    }, {
        path: '/account/logout',
        exact: true,
        auth: true,
        component: Logout
    }, {
        path: '/account/register',
        exact: true,
        auth: false,
        component: Register
    }, {
        path: '/account/forgot-password',
        exact: true,
        auth: false,
        component: ForgotPassword
    }, {
        path: '/account/reset-password/:token',
        exact: true,
        auth: false,
        component: ResetPassword
    }, {
        path: '/account/settings',
        exact: true,
        auth: true,
        component: Settings
    }, {
        path: '*',
        exact: true,
        auth: false,
        component: NotFound
    }
];

export default routes;
