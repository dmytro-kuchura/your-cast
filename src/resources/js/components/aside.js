import React from 'react';
import {connect} from 'react-redux';
import {Link} from 'react-router-dom';

const opened = {display: 'none'};
const closed = {display: 'block'};

class Aside extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            authUser: null,
            dropdownShows: false
        };

        this.handleDropdown = this.handleDropdown.bind(this);
    }

    componentDidUpdate(prevProps) {
        if (prevProps.authUser !== this.props.authUser) {
            this.setState({authUser: this.props.authUser})
        }
    }

    handleDropdown(event) {
        event.preventDefault();

        console.log(event.target.id)

        switch (event.target.id) {
            case 'shows':
                this.setState({dropdownShows: !this.state.dropdownShows});
                break;
        }
    }

    render() {
        return (
            <>
                <div className="navigation">
                    <div className="navigation-header">
                        <span>Navigation</span>
                        <a href="#">
                            <i className="ti-close"></i>
                        </a>
                    </div>
                    <div className="navigation-menu-body">
                        <ul>
                            <li>
                                <a href="index.html">
                                    <span className="nav-link-icon">
                                        <i data-feather="pie-chart"></i>
                                    </span>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailing.html">
                                    <span className="nav-link-icon">
                                        {/*<i data-feather="corner-up-right"></i>*/}
                                    </span>
                                    <span>Mailing</span>
                                </a>
                                <ul>
                                    <li>
                                        <a target="_blank" href="email-template-basic.html">Basic</a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="email-template-alert.html">Alert</a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="email-template-billing.html">Billing</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </>
        )
    };
}

const mapStateToProps = (state) => {
    return {
        authUser: state.Auth.user
    }
};

export default connect(mapStateToProps)(Aside);
