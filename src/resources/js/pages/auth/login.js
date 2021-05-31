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

                <h5>Sign in</h5>

                <form onSubmit={this.handleSubmit} method="POST">
                    <div className="form-group">
                        <input className="form-control"
                               placeholder="Email"
                               id="email"
                               type="email"
                               name="email"
                               onChange={this.handleChange}/>
                    </div>
                    <div className="form-group">
                        <input type="password"
                               placeholder="Password"
                               className="form-control"
                               id="password"
                               name="password"
                               onChange={this.handleChange}
                               autoComplete="off"/>
                    </div>
                    <div className="form-group d-flex justify-content-between">
                        <div className="custom-control custom-checkbox">
                            <input type="checkbox" className="custom-control-input" id="customCheck1"/>
                            <label className="custom-control-label" htmlFor="customCheck1">Remember me</label>
                        </div>
                        <Link to="/account/forgot-password">Reset password</Link>
                    </div>
                    <button className="btn btn-primary btn-block">Sign in</button>
                    <hr/>
                    {/*<p className="text-muted">Login with your social media account.</p>*/}
                    {/*<ul className="list-inline">*/}
                    {/*    <li className="list-inline-item">*/}
                    {/*        <a href="#" className="btn btn-floating btn-facebook">*/}
                    {/*            <i className="fa fa-facebook"></i>*/}
                    {/*        </a>*/}
                    {/*    </li>*/}
                    {/*    <li className="list-inline-item">*/}
                    {/*        <a href="#" className="btn btn-floating btn-twitter">*/}
                    {/*            <i className="fa fa-twitter"></i>*/}
                    {/*        </a>*/}
                    {/*    </li>*/}
                    {/*    <li className="list-inline-item">*/}
                    {/*        <a href="#" className="btn btn-floating btn-google">*/}
                    {/*            <i className="fa fa-google"></i>*/}
                    {/*        </a>*/}
                    {/*    </li>*/}
                    {/*</ul>*/}
                    {/*<hr>*/}
                    <p className="text-muted">Don't have an account?</p>
                    <Link to="/account/register">Register now!</Link>
                </form>
            </div>
        );
    }
}

const mapStateToProps = (state) => {
        return {
            isAuthenticated: state.Auth.isAuthenticated,
        }
    }
;

export default connect(mapStateToProps)(Login)
