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
        const active = 'steps-form-btn js-active';
        const disabled = 'steps-form-btn';

        return (
            <>
                <div className="row">
                    <div className="col-12 ml-auto mr-auto mb-4">
                        <div className="steps-form">
                            <span className={this.state.step === 1 ? active : disabled}>1. Show Info</span>
                            <span className={this.state.step === 2 ? active : disabled}>2. Show Artwork</span>
                            <span className={this.state.step === 3 ? active : disabled}>3. Format</span>
                            <span className={this.state.step === 4 ? active : disabled}>4. Other Details</span>
                            <span className={this.state.step === 5 ? active : disabled}>5. Categorization</span>
                            <span className={this.state.step === 6 ? active : disabled}>6. Owner Details</span>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}

export default (Navigation)
