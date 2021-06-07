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

        console.log(event.target.id);

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
                                <Link to="/account/dashboard" id="shows" onClick={this.handleDropdown}>
                                    <span className="nav-link-icon">
                                        <i data-feather="corner-up-right"></i>
                                    </span>
                                    <span>Shows</span>
                                    <i className={'sub-menu-arrow rotate-in ' + (this.state.dropdownShows ? 'ti-minus' : 'ti-plus')}></i>
                                </Link>
                                <ul style={this.state.dropdownShows ? opened : closed}>
                                    <li>
                                        <Link to="/account/dashboard">Dashboard</Link>
                                    </li>
                                    <li>
                                        <Link to="/account/dashboard">Podcasts</Link>
                                    </li>
                                    <li>
                                        <Link to="/account/dashboard">Billing</Link>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <Link to="/account/notifications">
                                    <span className="nav-link-icon">
                                        <i data-feather="check-square"></i>
                                    </span>
                                    <span>Notifications</span>
                                    <span className="badge badge-warning">2</span>
                                </Link>
                            </li>
                            <li>
                                <a href="#" className="disabled">
                                    <span className="nav-link-icon">
                                        <i data-feather="mouse-pointer"></i>
                                    </span>
                                    <span>Analytics</span>
                                </a>
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
