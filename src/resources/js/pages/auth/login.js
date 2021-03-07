import React from 'react';
import {Link, Redirect} from 'react-router-dom';
import {connect} from 'react-redux'
import {login} from '../../services/auth-service';

class Login extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            credentials: {
                email: null,
                password: null,
            },
            error: null,
            loading: false
        };

        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleChange(event) {
        const name = event.target.name;
        const value = event.target.value;
        const {credentials} = this.state;
        credentials[name] = value;
    }

    handleSubmit(event) {
        event.preventDefault();
        const {credentials} = this.state;

        this.props.dispatch(login(credentials))
            .catch(({error, statusCode}) => {
                const responseError = {
                    isError: true,
                    code: statusCode,
                    text: error
                };
                this.setState({responseError});
                this.setState({
                    isLoading: false
                });
            })
    }

    render() {
        const {from} = this.props.location.state || {from: {pathname: '/'}};
        const {isAuthenticated} = this.props;

        if (isAuthenticated) {
            return (
                <Redirect to={from}/>
            )
        }

        return (
            <div className="login-form login-signin">
                <form className="form" noValidate="novalidate" id="kt_login_signin_form">
                    <div className="pb-13 pt-lg-0 pt-5">
                        <h3 className="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Welcome to
                            YouCast</h3>
                        <span className="text-muted font-weight-bold font-size-h4">New Here?
                            <Link to="/account/register"
                                  className="text-primary font-weight-bolder"
                                  id="kt_login_signup"> Create an Account</Link>
                        </span>
                    </div>
                    <div className="form-group">
                        <label className="font-size-h6 font-weight-bolder text-dark">Email</label>
                        <input className="form-control form-control-solid h-auto py-6 px-6 rounded-lg"
                               type="text"
                               name="username"
                               autoComplete="off"/>
                    </div>
                    <div className="form-group">
                        <div className="d-flex justify-content-between mt-n5">
                            <label className="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                            <Link to="/account/login"
                                  className="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5"
                                  id="kt_login_forgot">Forgot Password ?</Link>
                        </div>
                        <input className="form-control form-control-solid h-auto py-6 px-6 rounded-lg"
                               type="password"
                               name="password"
                               autoComplete="off"/>
                    </div>
                    <div className="pb-lg-0 pb-5">
                        <button type="button" id="kt_login_signin_submit"
                                className="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In
                        </button>
                        <button type="button"
                                className="btn btn-light-primary font-weight-bolder px-8 py-4 my-3 font-size-lg">
									<span className="svg-icon svg-icon-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             viewBox="0 0 20 20" fill="none">
											<path
                                                d="M19.9895 10.1871C19.9895 9.36767 19.9214 8.76973 19.7742 8.14966H10.1992V11.848H15.8195C15.7062 12.7671 15.0943 14.1512 13.7346 15.0813L13.7155 15.2051L16.7429 17.4969L16.9527 17.5174C18.879 15.7789 19.9895 13.221 19.9895 10.1871Z"
                                                fill="#4285F4"/>
											<path
                                                d="M10.1993 19.9313C12.9527 19.9313 15.2643 19.0454 16.9527 17.5174L13.7346 15.0813C12.8734 15.6682 11.7176 16.0779 10.1993 16.0779C7.50243 16.0779 5.21352 14.3395 4.39759 11.9366L4.27799 11.9466L1.13003 14.3273L1.08887 14.4391C2.76588 17.6945 6.21061 19.9313 10.1993 19.9313Z"
                                                fill="#34A853"/>
											<path
                                                d="M4.39748 11.9366C4.18219 11.3166 4.05759 10.6521 4.05759 9.96565C4.05759 9.27909 4.18219 8.61473 4.38615 7.99466L4.38045 7.8626L1.19304 5.44366L1.08875 5.49214C0.397576 6.84305 0.000976562 8.36008 0.000976562 9.96565C0.000976562 11.5712 0.397576 13.0882 1.08875 14.4391L4.39748 11.9366Z"
                                                fill="#FBBC05"/>
											<path
                                                d="M10.1993 3.85336C12.1142 3.85336 13.406 4.66168 14.1425 5.33717L17.0207 2.59107C15.253 0.985496 12.9527 0 10.1993 0C6.2106 0 2.76588 2.23672 1.08887 5.49214L4.38626 7.99466C5.21352 5.59183 7.50242 3.85336 10.1993 3.85336Z"
                                                fill="#EB4335"/>
										</svg>
									</span>Sign in with Google
                        </button>
                    </div>
                </form>
            </div>
        );
    }
}

const mapStateToProps = (state) => {
    return {
        isAuthenticated: state.Auth.isAuthenticated,
    }
};

export default connect(mapStateToProps)(Login)
