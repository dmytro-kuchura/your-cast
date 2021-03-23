import React from 'react';
import {connect} from 'react-redux';
import {Redirect} from 'react-router-dom';

class ConfirmEmail extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            auth: {
                isVerified: false
            }
        }
    }

    componentDidUpdate(prevProps) {
        if (prevProps !== this.props) {
            this.setState({
                auth: this.props.auth
            })
        }
    }

    componentWillUnmount() {
        this.setState({
            show: {}
        })
    }

    render() {
        if (this.props.auth.isVerified) {
            return (
                <Redirect to={'/account/dashboard'}/>
            )
        }

        return (
            <>
                <div className="container">
                    <div className="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
                        <div className="alert-icon">
                        <span className="svg-icon svg-icon-primary svg-icon-xl">
						    <img src="/media/svg/mail-at.svg"/>
                        </span>
                        </div>
                        <div className="alert-text">
                            <p>
                                Your account was created successfully! Check your email to confirm your account and sign in.
                                <br/>
                                Didn't get an email? <a>Resend confirmation.</a>
                            </p>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}

const mapStateToProps = (state) => {
    return {
        auth: state.Auth,
    }
};

export default connect(mapStateToProps)(ConfirmEmail)
