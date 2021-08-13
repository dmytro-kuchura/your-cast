import React from 'react';
import {Link} from 'react-router-dom';

class HeaderButtons extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            route: null,
        };
    }

    componentDidUpdate(prevProps) {
        if (prevProps.auth !== this.props.auth) {
            this.setState({route: this.props.route})
        }
    }

    render() {
        console.log(this.state.route);

        return (
            <>
                <div className="mt-2 mt-md-0">
                    <Link to={'/account/episodes/create'} className="btn btn-success mr-1 ml-1" title="Filter">New Episode</Link>
                    <Link to={'/account/show/create'} className="btn btn-success mr-1 ml-1" title="Filter">New Show</Link>
                </div>
            </>
        );
    }
}

export default HeaderButtons;
