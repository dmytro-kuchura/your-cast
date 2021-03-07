import React from 'react'
import {connect} from 'react-redux'
import AuthFooter from "./components/auth/footer";
import Aside from "./components/auth/aside";

class Auth extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <>
                <div
                    className="login d-flex flex-column flex-lg-row flex-column-fluid bg-white"
                    id="kt_login">
                    <Aside/>
                    <div
                        className="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
                        <div className="d-flex flex-column-fluid flex-center">
                            {this.props.children}
                        </div>
                        <AuthFooter/>
                    </div>
                </div>
            </>
        );
    }
}

const mapStateToProps = (state) => {
    return {
        isAuthenticated: state.Auth.isAuthenticated
    }
};

export default connect(mapStateToProps)(Auth);
