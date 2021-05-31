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
                <div className="layout-wrapper">
                    <Header/>
                    <div className="content-wrapper">
                        <Aside/>
                        <div className="content-body">
                            <div className="content web-app">
                                    {this.props.children}
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
