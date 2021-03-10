import React from 'react';
import {connect} from 'react-redux';
import {Redirect} from 'react-router-dom';

class Dashboard extends React.Component {
    constructor(props) {
        super(props);

        this.state = {};
    }

    render() {
        if (this.props.auth.isVerified) {
            return (
                <Redirect to={'/account/show/create'}/>
            )
        }

        return (
            <>
            </>
        );
    }
}

const mapStateToProps = (state) => {
    return {
        auth: state.Auth,
    }
};

export default connect(mapStateToProps)(Dashboard)
