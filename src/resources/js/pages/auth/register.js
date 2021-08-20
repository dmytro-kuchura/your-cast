import React from 'react';
import {Link, Redirect} from 'react-router-dom';
import {connect} from 'react-redux';
import {register} from '../../services/auth-service';

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
            .then(response => {
                this.props.history.push('/account/login')
            })
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
            <div className="form-wrapper">
                <div id="logo">
                    <img src="/media/img/podcasts-logo.png" alt="image" width={250}/>
                </div>

                <h5>Create account</h5>

                <form onSubmit={this.handleSubmit} method="POST">
                    <div className="form-group">
                        <input className="form-control"
                               type="text"
                               id="name"
                               name="name"
                               onChange={this.handleChange}
                               placeholder="Full name"
                               autoComplete="off"/>
                    </div>
                    <div className="form-group">
                        <input className="form-control"
                               required
                               placeholder="Email"
                               id="email"
                               type="email"
                               name="email"
                               onChange={this.handleChange}/>
                    </div>
                    <div className="form-group">
                        <input className="form-control"
                               id="password"
                               type="password"
                               name="password"
                               onChange={this.handleChange}
                               placeholder="Password"
                               autoComplete="off"/>
                    </div>
                    <div className="form-group">
                        <input className="form-control"
                               id="password_confirmation"
                               type="password"
                               name="password_confirmation"
                               onChange={this.handleChange}
                               placeholder="Confirm password"
                               autoComplete="off"/>
                    </div>
                    <button className="btn btn-primary btn-block">Register</button>
                    <hr/>
                    <p className="text-muted">Already have an account?</p>
                    <Link to="/account/login">Sign in!</Link>
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
