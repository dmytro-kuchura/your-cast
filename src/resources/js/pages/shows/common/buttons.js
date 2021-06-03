import React from 'react';

class Buttons extends React.Component {
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
                <div className="d-flex justify-content-between">
                    <div className="mr-2">
                        {this.state.step !== 1 ?
                            <button type="button"
                                    className="btn btn-light-primary"
                                    onClick={this.props.handlePreviousStep}>Previous
                            </button>
                            : null}
                    </div>
                    <div>
                        {this.state.step === 6 ?
                            <button type="submit"
                                    className="btn btn-success"
                                    onClick={this.props.handleSubmitForm}>Submit
                            </button>
                            : null}

                        {this.state.step !== 6 ?
                            <button type="submit"
                                    className="btn btn-primary"
                                    onClick={this.props.handleNextStep}>Next
                            </button>
                            : null}
                    </div>
                </div>
            </>
        );
    }
}

export default (Buttons)
