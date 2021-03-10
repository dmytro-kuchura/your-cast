import React from 'react';
import {connect} from 'react-redux';

const opened = {display: 'none'};
const closed = {display: 'block'};

class Aside extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            authUser: null,
            dropdownTests: false,
            dropdownPatients: false
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

        switch (event.target.id) {
            case 'tests':
                this.setState({dropdownTests: !this.state.dropdownTests});
                break;
            case 'patients':
                this.setState({dropdownPatients: !this.state.dropdownPatients});
                break;
        }
    }

    render() {
        return (
            <>
                <div className="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
                    <div className="brand flex-column-auto" id="kt_brand">
                        <a href="/account" className="brand-logo">
                            <img alt="Logo" src="/media/img/logo-light.png" />
                        </a>
                        <button className="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span className="svg-icon svg-icon svg-icon-xl">
                                <img src="/media/svg/angle-double-left.svg" alt="Angle double left" />
							</span>
                        </button>
                    </div>
                    <div className="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                        <div id="kt_aside_menu" className="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                             data-menu-dropdown-timeout="500">
                            <ul className="menu-nav">
                                <li className="menu-item" aria-haspopup="true">
                                    <a href="index.html" className="menu-link">
										<span className="svg-icon menu-icon">

										</span>
                                        <span className="menu-text">Dashboard</span>
                                    </a>
                                </li>

                                <li className="menu-section">
                                    <h4 className="menu-text">Layout</h4>
                                    <i className="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <li className="menu-item menu-item-submenu" aria-haspopup="true"
                                    data-menu-toggle="hover">
                                    <a href="#" className="menu-link menu-toggle">
										<span className="svg-icon menu-icon">

										</span>
                                        <span className="menu-text">Themes</span>
                                        <i className="menu-arrow"></i>
                                    </a>
                                    <div className="menu-submenu">
                                        <i className="menu-arrow"></i>
                                        <ul className="menu-subnav">
                                            <li className="menu-item menu-item-parent" aria-haspopup="true">
												<span className="menu-link">
													<span className="menu-text">Themes</span>
												</span>
                                            </li>
                                            <li className="menu-item" aria-haspopup="true">
                                                <a href="layout/themes/aside-light.html" className="menu-link">
                                                    <i className="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span className="menu-text">Light Aside</span>
                                                </a>
                                            </li>
                                            <li className="menu-item" aria-haspopup="true">
                                                <a href="layout/themes/header-dark.html" className="menu-link">
                                                    <i className="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span className="menu-text">Dark Header</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li className="menu-item" aria-haspopup="true">
                                    <a target="_blank" href="https://preview.keenthemes.com/metronic/demo1/builder.html"
                                       className="menu-link">
										<span className="svg-icon menu-icon">

										</span>
                                        <span className="menu-text">Builder</span>
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
