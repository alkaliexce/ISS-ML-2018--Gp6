function generateModel() {
    model = tf.sequential();
    model.add(tf.layers.dense({units: 61, inputShape: 61, activation: 'relu'}));
    model.add(tf.layers.dense({units: 1000, activation: 'relu'}));
    model.add(tf.layers.dense({units: 100, activation: 'relu'}));
    model.add(tf.layers.dense({units: 60, activation: 'relu'}));
    model.add(tf.layers.dense({units: 1}));
    model.compile({optimizer: 'adam', loss: 'meanSquaredError'});
    return model
}

async function trainModel(X, Y, iterations) {
    alert('Training data... Please do not close window...');
    tf.setBackend('webgl');
    // How many examples the model should "see" before making a parameter update.
    model = generateModel();

for(i=0;i<iterations;i++){
    X_tmp=X.slice();
    Y_tmp=Y.slice();
    while (true) {
        X_batch = X_tmp.splice(0, 10000);
        Y_batch = Y_tmp.splice(0, 10000);
        if (X_batch.length == 0) {
            break;
        }
        Xs = tf.tensor(X_batch);
        Ys = tf.tensor(Y_batch);
        //console.log(Xs.print(true));
        //console.log(Ys.print(true));
        const h = await model.fit(x = Xs, y = Ys, {batchsize: 32,  verbose: 2, shuffle: true});
        console.log(h.history.loss[0]);
    }
}
    alert("Saving Data to server... Please do not close window...");
    await model.save("http://localhost:83/updateModel.php");

    alert('Trained model saved!');
    window.location.href = "admin.php";
}

async function addRow(model, X, Y, iterations) {
    tf.setBackend('webgl');
    Xs = tf.tensor(X);
    Ys = tf.tensor(Y);
    console.log(Xs.print(true));
    console.log(Ys.print(true));

    for (var i = 0; i < iterations; i++) {
        const h = await model.fit(x = Xs, y = Ys, verbose = 2);
        console.log(h.history.loss[0]);
    }
    await model.save("http://localhost:83/updateModel.php");
}


async function predict(inputArray) {
    const model = await tf.loadModel('/model/model.json');
    //const model = await tf.loadFrozenModel('/model/model.json','/model/model.weights.bin');
    inputTensor = tf.tensor([inputArray]);
    predictedTensor = model.predict(inputTensor);
    return parseInt(Array.from(predictedTensor.dataSync()));
    //alert(model.getWeights());
}