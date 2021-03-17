import React from 'react';

class Navigation extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            step: 1
        };

        this.state.step = props.step;
    }

    componentDidUpdate(prevProps) {
        if (prevProps.step !== this.props.step) {
            this.setState({step: this.props.step})
        }
    }

    render() {
        return (
            <>
                <div className="wizard-nav">
                    <div className="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
                        <div className="wizard-step" data-wizard-type="step" data-wizard-state={this.state.step === 1 ? 'current': null}>
                            <div className="wizard-label">
                                <h3 className="wizard-title">
                                    <span>1.</span>Show Info</h3>
                                <div className="wizard-bar"></div>
                            </div>
                        </div>
                        <div className="wizard-step" data-wizard-type="step" data-wizard-state={this.state.step === 2 ? 'current': null}>
                            <div className="wizard-label">
                                <h3 className="wizard-title">
                                    <span>2.</span>Show Artwork</h3>
                                <div className="wizard-bar"></div>
                            </div>
                        </div>
                        <div className="wizard-step" data-wizard-type="step" data-wizard-state={this.state.step === 3 ? 'current': null}>
                            <div className="wizard-label">
                                <h3 className="wizard-title">
                                    <span>3.</span>Format</h3>
                                <div className="wizard-bar"></div>
                            </div>
                        </div>
                        <div className="wizard-step" data-wizard-type="step" data-wizard-state={this.state.step === 4 ? 'current': null}>
                            <div className="wizard-label">
                                <h3 className="wizard-title">
                                    <span>4.</span>Other Details</h3>
                                <div className="wizard-bar"></div>
                            </div>
                        </div>
                        <div className="wizard-step" data-wizard-type="step" data-wizard-state={this.state.step === 5 ? 'current': null}>
                            <div className="wizard-label">
                                <h3 className="wizard-title">
                                    <span>5.</span>Categorization</h3>
                                <div className="wizard-bar"></div>
                            </div>
                        </div>
                        <div className="wizard-step" data-wizard-type="step" data-wizard-state={this.state.step === 6 ? 'current': null}>
                            <div className="wizard-label">
                                <h3 className="wizard-title">
                                    <span>6.</span>Owner Details</h3>
                                <div className="wizard-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}

export default (Navigation)
