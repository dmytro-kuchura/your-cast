export function getButtons(props) {
    if (props.pathname === '/account/dashboard') {
        return {
            createShow: true,
            createEpisode: true
        };
    }
    if (props.pathname === '/account/show/list') {
        return {
            createShow: true,
            createEpisode: true
        };
    }
    if (props.pathname === '/account/episodes/list') {
        return {
            createShow: true,
            createEpisode: true
        };
    }
    if (props.pathname === '/account/episodes/create') {
        return {
            createShow: true,
            createEpisode: false
        };
    }

    return {
        createShow: false,
        createEpisode: false
    };
}
