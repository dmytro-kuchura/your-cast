import React from 'react';
import {connect} from 'react-redux';
import Breadcrumbs from './breadcrumbs';

class SubHeader extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            authUser: null,
        };
    }

    componentDidUpdate(prevProps) {
        if (prevProps.authUser !== this.props.authUser) {
            this.setState({authUser: this.props.authUser})
        }
    }

    render() {
        return (
            <>
                <div id="kt_subheader" className="subheader py-2 py-lg-4 subheader-solid">
                    <div
                        className="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <div className="d-flex align-items-center flex-wrap mr-1">
                            <div className="d-flex align-items-baseline mr-5">
                                <h5 className="text-dark font-weight-bold my-2 mr-5">Modal</h5>
                            </div>
                            <Breadcrumbs state={this.state.breadcrumbs}/>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}

const mapStateToProps = (state) => {
    return {
        authUser: state.Auth.user
    }
};

export default connect(mapStateToProps)(SubHeader);
