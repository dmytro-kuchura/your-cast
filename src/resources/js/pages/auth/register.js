import React from 'react';
import {Link, Redirect} from 'react-router-dom';
import {connect} from 'react-redux';
import {register} from '../../services/auth-service';
import {validate} from '../../helpers/validation';

const rules = {
    'name': ['required'],
    'email': ['email', 'nullable'],
    'password': ['required'],
    'password_confirmation': ['required'],
    'agree': ['required'],
};

class Register extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            credentials: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
            },
            error: null
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

        this.props.dispatch(register(credentials))
            .then({})
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
        const {from} = this.props.location.state || {from: {pathname: '/account/dashboard'}};
        const {isAuthenticated} = this.props;

        if (isAuthenticated) {
            return (
                <Redirect to={from}/>
            )
        }

        return (
            <div className="login-form login-signup">
                <form className="form" noValidate="novalidate" id="kt_login_signup_form" onSubmit={this.handleSubmit}
                      method="POST">
                    <div className="pb-13 pt-lg-0 pt-5">
                        <h3 className="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Sign Up</h3>
                        <p className="text-muted font-weight-bold font-size-h4">Enter your details to create your
                            account</p>
                        <span className="text-muted font-weight-bold font-size-h4">Already have an account?
                            <Link to="/account/login"
                                  className="text-primary font-weight-bolder"
                                  id="kt_login_signup"> Sign in</Link>
                        </span>
                    </div>
                    <div className="form-group">
                        <input className="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6"
                               type="text"
                               id="name"
                               name="name"
                               onChange={this.handleChange}
                               placeholder="Fullname"
                               autoComplete="off"/>
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
                    <div className="form-group">
                        <input className="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6"
                               id="password"
                               type="password"
                               name="password"
                               onChange={this.handleChange}
                               placeholder="Password"
                               autoComplete="off"/>
                    </div>
                    <div className="form-group">
                        <input className="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6"
                            // className={validate("phone", patient.phone, rules['phone']) ? "form-control is-invalid" : "form-control"}
                               id="password_confirmation"
                               type="password"
                               name="password_confirmation"
                               onChange={this.handleChange}
                               placeholder="Confirm password"
                               autoComplete="off"/>
                    </div>
                    <div className="form-group">
                        <label className="checkbox mb-0">
                            <input type="checkbox"
                                   className={validate("agree", null, rules['agree']) ? "form-control is-invalid" : "form-control"}
                                   name="agree"/>
                            <span></span>
                            <div className="ml-2">I Agree the
                                <a href="#"> terms and conditions</a>.
                            </div>
                        </label>
                    </div>
                    <div className="form-group d-flex flex-wrap pb-lg-0 pb-3">
                        <button type="submit" id="kt_login_signup_submit"
                                className="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit
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

export default connect(mapStateToProps)(Register)
