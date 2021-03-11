import {useLocation} from 'react-router';

function GetBreadcrumbs() {
    const location = useLocation();

    console.log(location)
}
