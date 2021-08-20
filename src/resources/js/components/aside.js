import React from 'react';
import {connect} from 'react-redux';
import {Link} from 'react-router-dom';

const closed = {display: 'none'};
const opened = {display: 'block'};

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

        switch (event.currentTarget.id) {
            case 'shows':
                this.setState({dropdownShows: !this.state.dropdownShows});
                break;
        }
    }

    render() {
        return (
            <>
                <div className="navigation">
                    <div className="navigation-menu-body">
                        <ul>
                            <li>
                                <Link to="/account/dashboard">
                                    <span className="nav-link-icon">
                                        <i className="fa fa-pie-chart"/>
                                    </span>
                                    <span>Dashboard</span>
                                </Link>
                            </li>
                            <li>
                                <Link to="/account/dashboard" id="shows" onClick={this.handleDropdown}>
                                    <span className="nav-link-icon">
                                        <i className="fa fa-microphone"/>
                                    </span>
                                    <span>Shows</span>
                                    <i className={'sub-menu-arrow rotate-in ' + (this.state.dropdownShows ? 'ti-minus' : 'ti-plus')}/>
                                </Link>
                                <ul style={this.state.dropdownShows ? opened : closed}>
                                    <li>
                                        <Link to="/account/show/list">Shows</Link>
                                    </li>
                                    <li>
                                        <Link to="/account/episodes/list">Episodes</Link>
                                    </li>
                                    <li>
                                        <Link className="disabled" to="/account/show/web">Website</Link>
                                    </li>
                                    <li>
                                        <Link className="disabled" to="/account/dashboard">Feed</Link>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <Link to="/account/statistic" className="disabled">
                                    <span className="nav-link-icon">
                                        <i className="fa fa-line-chart"/>
                                    </span>
                                    <span>Statistic</span>
                                </Link>
                            </li>
                            <li>
                                <Link to="/account/notifications">
                                    <span className="nav-link-icon">
                                        <i className="fa fa-bell"/>
                                    </span>
                                    <span>Notifications</span>
                                    <span className="badge badge-warning">2</span>
                                </Link>
                            </li>
                            <li>
                                <Link to="/account/analytics" className="disabled">
                                    <span className="nav-link-icon">
                                        <i className="fa fa-line-chart"/>
                                    </span>
                                    <span>Analytics</span>
                                </Link>
                            </li>
                            <li>
                                <Link to="/account/payments" className="disabled">
                                    <span className="nav-link-icon">
                                        <i className="fa fa-credit-card-alt"/>
                                    </span>
                                    <span>Payments</span>
                                </Link>
                            </li>
                            <li>
                                <Link to="/account/billing" className="disabled">
                                    <span className="nav-link-icon">
                                        <i className="fa fa-bank"/>
                                    </span>
                                    <span>Billing</span>
                                </Link>
                            </li>
                            <li>
                                <Link to="/account/help" className="disabled">
                                    <span className="nav-link-icon">
                                        <i className="fa fa-envelope-open"/>
                                    </span>
                                    <span>Help</span>
                                </Link>
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
