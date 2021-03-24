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

        console.log(event.target)

        switch (event.target.id) {
            case 'shows':
                this.setState({dropdownShows: !this.state.dropdownShows});
                break;
        }
    }

    render() {
        return (
            <>
                <div className="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
                    <div className="brand flex-column-auto" id="kt_brand">
                        <Link to={'/account/dashboard'} className="brand-logo">
                            <img alt="Logo" src="/media/img/logo-light.png"/>
                        </Link>
                        <button className="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span className="svg-icon svg-icon svg-icon-xl">
                                <img src="/media/svg/angle-double-left.svg" alt="Angle double left"/>
							</span>
                        </button>
                    </div>
                    <div className="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                        <div id="kt_aside_menu" className="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                             data-menu-dropdown-timeout="500">
                            <ul className="menu-nav">
                                <li className="menu-item" aria-haspopup="true">
                                    <Link to={'/account/dashboard'} className="menu-link">
										<span className="svg-icon menu-icon">

										</span>
                                        <span className="menu-text">Dashboard</span>
                                    </Link>
                                </li>
                                <li className="menu-section">
                                    <h4 className="menu-text">Content</h4>
                                    <i className="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <li className="menu-item menu-item-submenu" aria-haspopup="true"
                                    data-menu-toggle="hover" onClick={this.handleDropdown}>
                                    <a href="#" className="menu-link menu-toggle">
                                        <span className="svg-icon menu-icon"></span>
                                        <span className="menu-text" id="shows">Shows</span>
                                        <i className="menu-arrow"></i>
                                    </a>
                                    <div className="menu-submenu" style={this.state.dropdownShows ? closed : opened}>
                                        <i className="menu-arrow"></i>
                                        <ul className="menu-subnav">
                                            <li className="menu-item" aria-haspopup="true">
                                                <a href="layout/themes/aside-light.html" className="menu-link">
                                                    <i className="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span className="menu-text">Show all shows</span>
                                                </a>
                                            </li>
                                            <li className="menu-item" aria-haspopup="true">
                                                <a href="layout/themes/header-dark.html" className="menu-link">
                                                    <i className="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span className="menu-text">Create new show</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li className="menu-item menu-item-submenu" aria-haspopup="true"
                                    data-menu-toggle="hover">
                                    <a href="#" className="menu-link menu-toggle">
                                        <span className="svg-icon menu-icon"></span>
                                        <span className="menu-text">Episodes</span>
                                        <i className="menu-arrow"></i>
                                    </a>
                                    <div className="menu-submenu">
                                        <i className="menu-arrow"></i>
                                        <ul className="menu-subnav">
                                            <li className="menu-item" aria-haspopup="true">
                                                <a href="layout/themes/aside-light.html" className="menu-link">
                                                    <i className="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span className="menu-text">Show all episodes</span>
                                                </a>
                                            </li>
                                            <li className="menu-item" aria-haspopup="true">
                                                <a href="layout/themes/header-dark.html" className="menu-link">
                                                    <i className="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span className="menu-text">Add new episode</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li className="menu-section">
                                    <h4 className="menu-text">Settings</h4>
                                    <i className="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <li className="menu-item" aria-haspopup="true">
                                    <a target="_blank" href="https://preview.keenthemes.com/metronic/demo1/builder.html"
                                       className="menu-link">
										<span className="svg-icon menu-icon">

										</span>
                                        <span className="menu-text">Distribution settings</span>
                                    </a>
                                </li>
                                <li className="menu-section">
                                    <h4 className="menu-text">Information</h4>
                                    <i className="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <li className="menu-item" aria-haspopup="true">
                                    <a target="_blank" href="https://preview.keenthemes.com/metronic/demo1/builder.html"
                                       className="menu-link">
										<span className="svg-icon menu-icon">

										</span>
                                        <span className="menu-text">FAQ</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
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
