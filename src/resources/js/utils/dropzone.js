import React from 'react';
import {notification} from './noty';

class Dropzone extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            content: '',
        };

        this.handleSelectFile = this.handleSelectFile.bind(this);
        this.handleFileInput = this.handleFileInput.bind(this);
    }

    componentDidUpdate(prevProps) {
        if (prevProps !== this.props) {
            this.setState({
                content: this.props.content
            })
        }
    }

    handleFileInput() {
        document.getElementById('audio-file').click()
    }

    handleSelectFile(event) {
        if (event.target.files[0]) {
            let file = event.target.files[0];
            if (file.type !== 'audio/mpeg') {
                notification('This is not valid audio file, only *.mp3!', 'error');
            }
        }
    }

    render() {
        return (
            <div id="dropzone">
                <form className="dropzone needs-click dz-clickable" onClick={this.handleFileInput}>
                    <div className="dz-message needs-click">
                        <button type="button" className="dz-button">Episode audio file</button>
                        <br/>
                        <span className="note needs-click">
                            Click here to upload your audio file (<strong>max size 150 MB</strong>).
                        </span>
                    </div>
                    <input id="audio-file" hidden type="file" onChange={this.handleSelectFile}/>
                </form>
            </div>
        );
    }
}

export default Dropzone;
