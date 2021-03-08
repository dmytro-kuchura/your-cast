import React from 'react';
import {Link, Redirect} from 'react-router-dom'
import {connect} from 'react-redux'
import {resetPassword} from '../../services/auth-service';

class ForgotPassword extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            data: {
                email: null,
            },
            error: null,
            isLoading: false
        };

        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleChange(event) {
        const name = event.target.name;
        const value = event.target.value;
        const {data} = this.state;
        data[name] = value;
    }

    handleSubmit(event) {
        event.preventDefault();
        const {data} = this.state;

        this.props.dispatch(resetPassword(data))
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
            <div className="login-form login-forgot">
                <form className="form" noValidate="novalidate" id="kt_login_forgot_form" onSubmit={this.handleSubmit}
                      method="POST">
                    <div className="pb-13 pt-lg-0 pt-5">
                        <h3 className="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Forgotten Password ?</h3>
                        <p className="text-muted font-weight-bold font-size-h4">Enter your email to reset your
                            password</p>
                    </div>
                    <div className="form-group">
                        <input className="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6"
                               id="email"
                               type="email"
                               name="email"
                               onChange={this.handleChange}
                               placeholder="Email"
                               autoComplete="off"/>
                    </div>
                    <div className="form-group d-flex flex-wrap pb-lg-0">
                        <button type="submit" id="kt_login_forgot_submit"
                                className="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit
                        </button>
                        <Link to="/account/login"
                              className="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3"
                              id="kt_login_forgot">Cancel</Link>
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

export default connect(mapStateToProps)(ForgotPassword)
