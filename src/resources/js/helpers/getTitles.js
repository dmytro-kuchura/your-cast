export function getTitles(props) {
    if (props.pathname === '/account/show/create') {
        return 'Create show';
    }

    if (props.pathname === '/account/confirm-email') {
        return 'Confirm email';
    }

    if (props.pathname === '/account/dashboard') {
        return 'Dashboard';
    }

    if (props.pathname === '/account/show/list') {
        return 'Shows';
    }

    if (props.pathname === '/account/show/create') {
        return 'Show create';
    }

    if (props.pathname === '/account/podcasts/list') {
        return 'Podcasts';
    }

    if (props.pathname === '/account/podcasts/create') {
        return 'Podcast create';
    }

    return 'Dashboard';
}
