import Logout from '../pages/logout';

import Login from '../pages/auth/login'
import Register from '../pages/auth/register'
import ForgotPassword from '../pages/auth/forgot-password'
import ResetPassword from '../pages/auth/reset-password'
import ConfirmEmail from '../pages/auth/confirm-email';

import Dashboard from '../pages/dashboard'
import Settings from '../pages/settings';
import NotFound from '../pages/not-found';

import ShowCreate from '../pages/shows/show-create';
import ShowDashboard from '../pages/shows/show-dashboard';
import ShowList from '../pages/shows/show-list';

const routes = [
    {
        path: '/account/dashboard',
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
        path: '/account/confirm-email',
        exact: true,
        auth: true,
        component: ConfirmEmail
    }, {
        path: '/account/show/:id',
        exact: true,
        auth: true,
        component: ShowDashboard
    },  {
        path: '/account/show/create',
        exact: true,
        auth: true,
        component: ShowCreate
    },  {
        path: '/account/shows',
        exact: true,
        auth: true,
        component: ShowList
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
