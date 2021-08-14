export function getBreadcrumbs(props) {
    if (props.pathname === '/account/confirm-email') {
        return [
            {
                name: 'Confirm email',
                link: '/account/confirm-email'
            }
        ];
    }
    if (props.pathname === '/account/dashboard') {
        return [
            {
                name: 'Dashboard',
                link: '/account/dashboard'
            }
        ];
    }
    if (props.pathname === '/account/show/list') {
        return [
            {
                name: 'Dashboard',
                link: '/account/dashboard'
            }
        ];
    }
    if (props.pathname === '/account/episodes/list') {
        return [
            {
                name: 'Dashboard',
                link: '/account/dashboard'
            }
        ];
    }
    if (props.pathname === '/account/episodes/create') {
        return [
            {
                name: 'Dashboard',
                link: '/account/dashboard'
            }, {
                name: 'Episodes',
                link: '/account/episodes/list'
            }
        ];
    }

    return [];
}
