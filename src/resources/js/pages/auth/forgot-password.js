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
            <div className="form-wrapper">
                <div id="logo">
                    <img src="/media/img/podcasts-logo.png" alt="image" width={250}/>
                </div>

                <h5>Reset password</h5>

                <form onSubmit={this.handleSubmit} method="POST">
                    <div className="form-group">
                        <input className="form-control"
                               required
                               placeholder="Email"
                               id="email"
                               type="email"
                               name="email"
                               onChange={this.handleChange}/>
                    </div>
                    <button className="btn btn-primary btn-block">Submit</button>
                    <hr/>
                    <Link to="/account/login">Cancel</Link>
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
