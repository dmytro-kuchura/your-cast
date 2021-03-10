import React from 'react'
import {connect} from 'react-redux'
import Footer from './components/footer'
import Aside from './components/aside';
import HeaderMobile from './components/header-mobile';
import SubHeader from './components/sub-header';
import Header from './components/header';

class Main extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <>
                <HeaderMobile/>
                <div className="d-flex flex-column flex-root">
                    <div className="d-flex flex-row flex-column-fluid page">
                        <Aside/>
                        <div className="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                            <Header/>
                            <div className="content d-flex flex-column flex-column-fluid" id="kt_content">
                                <SubHeader/>
                                <div className="d-flex flex-column-fluid">
                                    {this.props.children}
                                </div>
                            </div>
                            <Footer/>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}

const mapStateToProps = (state) => {
    return {
        isAuthenticated: state.Auth.isAuthenticated
    }
};

export default connect(mapStateToProps)(Main);
