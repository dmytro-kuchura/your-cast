import React from 'react';
import {connect} from 'react-redux';
import {Link} from 'react-router-dom';

class HeaderMobile extends React.Component {
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
                <div
                    id="kt_header_mobile" className="header-mobile align-items-center">
                    <Link to="/">
                        <img alt="logo" src="/media/img/logo-light.png"/>
                    </Link>

                    <div className="d-flex align-items-center">
                        <button className="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                            <span/>
                        </button>

                        <button className="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
                            <span/>
                        </button>

                        <button
                            className="btn btn-hover-text-primary p-0 ml-2"
                            id="kt_header_mobile_topbar_toggle"
                        >
                          <span className="svg-icon svg-icon-xl">
                          {/*   /media/svg/icons/General/User.svg */}
                          </span>
                        </button>
                    </div>
                </div>
            </>
        );
    }
}

const mapStateToProps = (state) => {
    return {
        user: state.Auth.user
    }
};

export default connect(mapStateToProps)(HeaderMobile);
